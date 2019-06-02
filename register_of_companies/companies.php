<?php

require_once "config.php";
require_once "create.php";
require_once "edit.php";
require_once "selectSingle.php";
require_once "delete.php";
require_once "printMenu.php";
require_once "selectAll.php";
require_once "writeToFile.php";

while( true ) {
    // Print the menu on console
    printMenu();

    // Read user choice
    $choice = trim( fgets(STDIN) );

    // Exit application
    if( $choice == 6 ) {

        break;
    }

    // Act based on user choice
    switch( $choice ) {

        // inserting company
        case 1:
            {
                add();

                break;
            }

        // view all companies
        case 2:
            {
                selectAll();
                break;
            }

        // select company to edit
        case 3:
            {

                echo "Which company do you want to edit (type company ID): ";
                $id = trim(fgets(STDIN, 1024));

                selectById($id);

                echo "Witch row you would like to edit (type 6 to cancel editing)?\n";
                echo "Type the field number:";
                $rowNumb = trim(fgets(STDIN, 1024));
                echo "Type new information:";
                $parameter = trim(fgets(STDIN, 1024));

                    if ($rowNumb == 6) {
                        break;
                    }

                    // choosing which data to edit
                    switch ($rowNumb) {
                        case 1:
                            {
                                $sql = "UPDATE companies SET firstname = :parameter WHERE id = :id";
                                break;
                            }
                        case 2:
                            {
                                $sql = "UPDATE companies SET registration_code = :parameter WHERE id = :id";
                                break;
                            }
                        case 3:
                            {
                                while (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $parameter)) {
                                    echo "Enter valid email:";
                                    $parameter = trim(fgets(STDIN, 1024));
                                }
                                $sql = "UPDATE companies SET email = :parameter WHERE id = :id";
                                break;
                            }
                        case 4:
                            {
                                while (!preg_match("/^([0-9\-\(\)\/\+\s]{8,15})*$/", $parameter)) {
                                    echo "Enter valid phone:";
                                    $parameter = trim(fgets(STDIN, 1024));
                                }
                                $sql = "UPDATE companies SET phone = :parameter WHERE id = :id";
                                break;
                            }
                        case 5:
                            {
                                $sql = "UPDATE companies SET comment = :parameter WHERE id = :id";
                                break;
                            }
                        default:
                            {
                                echo "\n\nNo choice is entered. Please provide a valid choice.\n\n";
                            }
                    }

                    edit($id, $sql, $parameter);


                    echo "\nCompany information edited\n";


                break;
            }

        // delete data
        case 4:
            {
                echo "Which company do you want to delete (type company ID): ";
                $id = trim(fgets(STDIN, 1024));

                selectById($id);

                echo "\nDo you realy want to delete this company?\n";
                echo "Type yes/no: ";
                $confirm = trim(fgets(STDIN, 1024));

                if ($confirm == "yes") {
                    delete($id);

                    echo "\nCompany deleted\n";
                }

                break;
            }

        case 5:
            {
                writeToFile();
                echo "File downloaded";
                break;
            }

        default:
            {
                echo "\n\nNo choice is entered. Please provide a valid choice.\n\n";
            }
    }
}








