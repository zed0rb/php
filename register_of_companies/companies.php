<?php

require_once "config.php";
require_once "create.php";
require_once "edit.php";
require_once "selectSingle.php";
require_once "delete.php";
require_once "printMenu.php";
require_once "selectAll.php";

while( true ) {
    // Print the menu on console
    printMenu();

    // Read user choice
    $choice = trim( fgets(STDIN) );

    // Exit application
    if( $choice == 5 ) {

        break;
    }

    // Act based on user choice
    switch( $choice ) {

        case 1:
            {
                add();

                break;
            }
        case 2:
            {
                selectAll();
                break;
            }
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

                    switch ($rowNumb) {
                        case 1:
                            {
                                $sql = "UPDATE companies SET firstname = :parameter WHERE id = :id";
                                break;
                            }
                        case 2:
                            {
                                $sql = "UPDATE companies SET lastname = :parameter WHERE id = :id";
                                break;
                            }
                        case 3:
                            {
                                $sql = "UPDATE companies SET email = :parameter WHERE id = :id";
                                break;
                            }
                        case 4:
                            {
                                $sql = "UPDATE companies SET age = :parameter WHERE id = :id";
                                break;
                            }
                        case 5:
                            {
                                $sql = "UPDATE companies SET location = :parameter WHERE id = :id";
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

        default:
            {
                echo "\n\nNo choice is entered. Please provide a valid choice.\n\n";
            }
    }
}








