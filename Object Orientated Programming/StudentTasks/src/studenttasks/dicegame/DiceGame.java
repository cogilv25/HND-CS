/*======================================================
* file: DiceGame.java
* Author: Calum Lindsay
* Created: 15-09/2021
* Last Modified: 15/09/2021
* Notes: Implements 2 basic dice games where players roll
* dice; one game uses one dice per player and is a best of
* 5 and the other uses two dice per player and the player
* to roll the same value for both their dice first wins.
========================================================*/

package studenttasks.dicegame;

import java.util.Scanner;

public class DiceGame extends studenttasks.Task {
    public DiceGame()
    {
        this.setName("Dice Game");
    }
    
    public void playGame1()
    {
        Dice player1Dice = new Dice();
        Dice player2Dice = new Dice();
    }
    
    public void playGame2()
    {
        Dice player1Dice[] = {new Dice(), new Dice()};
        Dice player2Dice[] = {new Dice(), new Dice()};
        
    }
    
    @Override
    public void run()
    {
        int input = 0;
        Scanner scan = new Scanner(System.in);
        while(input<1 || input > 2)
        {
            System.out.println("Choose a game to play:\n"
                             + "Game 1 (Best of 5)\n"
                             + "Game 2 (First to matching dice)\n\n");

            System.out.print("Please enter your selection (1 or 2): ");
            try{
                input = scan.nextInt();
            }catch(Exception e){scan.nextLine();}
            
            if(input <1 || input > 2)
            {
                System.out.println("Invalid Input!!!\n\n\n");
            }
        }
        scan.close();
        if(input == 1)
            playGame1();
        else
            playGame2();
    }
          
}
