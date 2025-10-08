<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '../includes/session.php';
        // Set your API key
        $key = 'sk_test_51P4n0YEhs6JVxKXwr0JtZWuDkZBOd31zwu2wxuPNNBjnCiEO5miUj5XPqqc2NitoIxCagZFjIwXH87cKSwO2ZpXJ00xAIxK30C';
    
        // Customer data
        $customerData = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
        ];
    
        // Create Customer
        $Customer = curl_init();
        curl_setopt($Customer, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
        curl_setopt($Customer, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($Customer, CURLOPT_POST, 1);
        curl_setopt($Customer, CURLOPT_POSTFIELDS, http_build_query($customerData));
        curl_setopt($Customer, CURLOPT_USERPWD, $key . ':');
        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        curl_setopt($Customer, CURLOPT_HTTPHEADER, $headers);
        $customerResult = curl_exec($Customer);
        if ($customerResult === false) {
            echo "Customer creation failed: " . curl_error($Customer);
            // Handle the error appropriately
        }
        curl_close($Customer);
    
        $customerResponse = json_decode($customerResult, true);
        // Check if customer creation was successful
        if (isset($customerResponse['id'])) {
            // Attach a payment method (card) to the customer
            $cardData = array(
                'source' => 'tok_visa',
            );
    
            $url_attach_card = 'https://api.stripe.com/v1/customers/' . $customerResponse['id'] . '/sources';
            $chAttachCard = curl_init($url_attach_card);
            curl_setopt($chAttachCard, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($chAttachCard, CURLOPT_POST, true);
            curl_setopt($chAttachCard, CURLOPT_POSTFIELDS, http_build_query($cardData));
            curl_setopt($chAttachCard, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $key
            ));
            $attachCardResult = curl_exec($chAttachCard);
            if ($attachCardResult === false) {
                echo "Error attaching card to customer: " . curl_error($chAttachCard);
                // Handle the error appropriately
            } else {
                // Decode the response
                $attachCardResponse = json_decode($attachCardResult, true);
    
                // Check if card attachment was successful
                if (isset($attachCardResponse['id'])) {
                    echo "Card added successfully! Card ID: " . $attachCardResponse['id'];
    
                    // Charge the customer using the attached card
                    $paymentData = [
                        'currency' => 'usd',
                        'customer' => $customerResponse['id'],
                        'source' => $attachCardResponse['id'],
                        'amount' => 0, 
                    ];

                    if (!empty($_SESSION['premium_adult_ticket_num'])) {
                        $paymentData['amount'] += 50 * 100 * $_SESSION['premium_adult_ticket_num'];
                    }
            
                    // Purchase premium child ticket product if available
                    if (!empty($_SESSION['premium_child_ticket_num'])) {
                        $paymentData['amount'] += 40 * 100 * $_SESSION['premium_child_ticket_num'];
                    }
            
                    // Purchase standard adult ticket product 
                    if (!empty($_SESSION['standard_adult_ticket_num'])) {
                        $paymentData['amount'] += 25 * 100 * $_SESSION['standard_adult_ticket_num'];
                    }
            
                    // Purchase standard child ticket product 
                    if (!empty($_SESSION['standard_child_ticket_num'])) {
                        $paymentData['amount'] += 20 * 100 * $_SESSION['standard_child_ticket_num'];
                    }

                    if (!empty($_SESSION['accommodation'])) {
                        $paymentData['amount'] += $_SESSION['amount'] * 100;
                    }
                    // Set up the request to create a charge
                    $url_charge = 'https://api.stripe.com/v1/charges';
                    $chCharge = curl_init($url_charge);
                    curl_setopt($chCharge, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($chCharge, CURLOPT_POST, true);
                    curl_setopt($chCharge, CURLOPT_POSTFIELDS, http_build_query($paymentData));
                    curl_setopt($chCharge, CURLOPT_HTTPHEADER, array(
                        'Authorization: Bearer ' . $key
                    ));

                    $chargeResult = curl_exec($chCharge);
                    if ($chargeResult === false) {
                        echo "Error creating charge: " . curl_error($chCharge);
                        // Handle the error appropriately
                    } else {
                        // Decode the response
                        $chargeResponse = json_decode($chargeResult, true);
    
                        // Check if charge creation was successful
                        if (isset($chargeResponse['id'])) {
                            $db = require '../includes/db.php';
                            $sql =  $db->prepare("UPDATE db.points SET Points = Points + :points WHERE CustomerID = :CustomerID");
                            $sql->bindParam(':CustomerID', $_SESSION['CustomerID']);
                            $sql->bindParam(':points', $_SESSION['Points']);
                            $sql->execute();

                            $sql2 =  $db->prepare("INSERT INTO db.orders (CustomerID, TicketID, Quantity, Accommodation, OrderDate) VALUES (:CustomerID, :TicketID, :Quantity, :Accommodation, :OrderDate)");
                            $sql2->bindParam(':CustomerID', $_SESSION['CustomerID']);


                            $quantity = 0;
                            $TicketID = array();

                            if (!empty($_SESSION['premium_adult_ticket_num']) || !empty($_SESSION['premium_child_ticket_num'])) {
                                if (!empty($_SESSION['premium_adult_ticket_num'])) {
                                    $quantity += $_SESSION['premium_adult_ticket_num'];
                                    $TicketID[] = "3";
                                    $ticket = "UPDATE db.tickets
                                            SET Quantity = Quantity - :amount
                                            WHERE Type = 'Premium' AND Visitor = 'Adult';";
                                    $ticket = $db->prepare($ticket);
                                    $ticket->bindParam(':amount', $_SESSION['premium_adult_ticket_num']);
                                    $ticket->execute();
                                }
                                if (!empty($_SESSION['premium_child_ticket_num'])) {
                                    $quantity += $_SESSION['premium_child_ticket_num'];
                                    $TicketID[]  = "4";
                                    $ticket = "UPDATE db.tickets
                                            SET Quantity = Quantity - :amount
                                            WHERE Type = 'Premium' AND Visitor = 'Child';";
                                    $ticket = $db->prepare($ticket);
                                    $ticket->bindParam(':amount', $_SESSION['premium_child_ticket_num']);
                                    $ticket->execute();
                                }
                            }

                            if (!empty($_SESSION['standard_adult_ticket_num']) || !empty($_SESSION['standard_child_ticket_num'])) {
                                if (!empty($_SESSION['standard_adult_ticket_num'])) {
                                    $quantity += $_SESSION['standard_adult_ticket_num'];
                                    $TicketID[] = "1";
                                    $ticket = "UPDATE db.tickets
                                            SET Quantity = Quantity - :amount
                                            WHERE Type = 'Standard' AND Visitor = 'Adult';";
                                    $ticket = $db->prepare($ticket);
                                    $ticket->bindParam(':amount', $_SESSION['standard_adult_ticket_num']);
                                    $ticket->execute();
                                }
                                if (!empty($_SESSION['standard_child_ticket_num'])) {
                                    $quantity += $_SESSION['standard_child_ticket_num'];
                                    $TicketID[] = "2";
                                    $ticket = "UPDATE db.tickets
                                            SET Quantity = Quantity - :amount
                                            WHERE Type = 'Standard' AND Visitor = 'Child';";
                                    $ticket = $db->prepare($ticket);
                                    $ticket->bindParam(':amount', $_SESSION['standard_child_ticket_num']);
                                    $ticket->execute();
                                }
                            }

                            // Code for inserting orders
                            if (!empty($TicketID)) {
                                $Tickets = implode(",", $TicketID);
                                $sql2->bindParam(':TicketID', ($Tickets));
                                $sql2->bindParam(':Quantity', $quantity);
                                $date = date("Y-m-d H:i:s");
                                $null;
                                $sql2->bindParam(':Accommodation', $null);
                                $sql2->bindParam(':OrderDate', $date);
                                $sql2->execute();
                            }

                            // Code for inserting reservation
                            if (isset($_SESSION['accommodation'])) {
                                $sql3 = $db->prepare("INSERT INTO db.reservation (AccommodationID, Name, Guests, StartDate, EndDate) VALUES (:AccommodationID, :Name, :Guests, :StartDate, :EndDate)");
                                $sql3->bindParam(':AccommodationID', $_SESSION['ID']);
                                $sql3->bindParam(':Name', $_SESSION['accommodation']);
                                $sql3->bindParam(':Guests', $_SESSION['guests']);
                                $sql3->bindParam(':StartDate', $_SESSION['start_date']);
                                $sql3->bindParam(':EndDate', $_SESSION['end_date']);
                                $sql3->execute();
                            } else {
                                $null;
                                $sql2->bindParam(':Accommodation', $null);
                            }

                            
                            unset($_SESSION['Points']);
                            unset($_SESSION['amount']);
                            unset($_SESSION['accommodation']);
                            unset($_SESSION['Points']);
                            unset($_SESSION['accommodation_location']);
                            unset($_SESSION['start_date']);
                            unset($_SESSION['end_date']);
                            unset($_SESSION['premium_date']);
                            unset($_SESSION['standard_date']);
                            unset($_SESSION['orders']);
                            unset($_SESSION['premium_adult_ticket_num']);
                            unset($_SESSION['premium_child_ticket_num']);
                            unset($_SESSION['standard_adult_ticket_num']);
                            unset($_SESSION['standard_child_ticket_num']);
                            unset($_SESSION['guests']);

                        } elseif (isset($chargeResponse['error']['message'])) {
                            echo "Error: " . $chargeResponse['error']['message'];
                        } else {
                            echo "Error: Unable to process payment.";
                        }
                    }
                    curl_close($chCharge);
                } else {
                    echo "Error: Card attachment failed.";
                }
            }
            curl_close($chAttachCard);
            header('Location: ../homepage.php');
        }
    }
