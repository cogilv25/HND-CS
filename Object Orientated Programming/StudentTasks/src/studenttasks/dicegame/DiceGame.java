/*======================================================
* file: DiceGame.java
* Author: Calum Lindsay
* Created: 15-09/2021
* Last Modified: 22/09/2021
* Notes: Implements 2 basic dice games where players roll
* dice; one game uses one dice per player and is a best of
* 5 and the other uses two dice per player and the player
* to roll the same value for both their dice first wins.
========================================================*/

package studenttasks.dicegame;

import java.io.IOException;
import java.util.Scanner;

public class DiceGame extends studenttasks.Task {
    
    
    private Scanner scan = new Scanner(System.in);
    
    public DiceGame()
    {
        this.setName("Dice Game");
    }
    
    private String playGame1()
    {
        Dice player1Dice = new Dice();
        Dice player2Dice = new Dice();
        int player1Wins = 0, player2Wins = 0;
        for(int i=0;i<5;++i)
        {
            System.out.println("Press enter to roll the dice!");
            
            scan.nextLine();
            
            int p1, p2;
            if(!((p1=player1Dice.rollDice()) == (p2=player2Dice.rollDice())))
            {
                //temp is a throwaway value due to fun java syntax
                int temp = (p1>p2)?player1Wins++:player2Wins++;
            }
            System.out.println("Player 1 rolled a " + p1);
            System.out.println("Player 2 rolled a " + p2 + "\n");
        }
        if(player1Wins == player2Wins)
            return "It's a draw!!  + 0/0";
        else if(player1Wins > player2Wins)
            return "Player 1 wins!!  " + player1Wins + '/' + player2Wins;
        else
            return "Player 2 wins!!  " + player2Wins + '/' + player1Wins;
    }
    
    private String playGame2()
    {
        Dice player1Dice[] = {new Dice(), new Dice()};
        Dice player2Dice[] = {new Dice(), new Dice()};
        int p1d1=-1,p1d2=-1,p2d1=-1,p2d2=-1;
        System.out.println("Press enter to roll the dice!");
        scan.nextLine();
        while(!(((p1d1=player1Dice[0].rollDice()) == (p1d2=player1Dice[1].rollDice())) ||
                ((p2d1=player2Dice[0].rollDice()) == (p2d2=player2Dice[1].rollDice()))))
        {
            System.out.println("Player 1 rolled a " + p1d1 + " and a " + p1d2);
            System.out.println("Player 2 rolled a " + p2d1 + " and a " + p2d2);
            System.out.println("Press enter to roll the dice!");
            scan.nextLine();
        }
        System.out.println("Player 1 rolled a " + p1d1 + " and a " + p1d2);
        if(p1d1 == p1d2)
        {
            System.out.println("Player 2 didn't get to roll.");
            return "Player 1 Wins!!";
        }
        else
        {
            System.out.println("Player 2 rolled a " + p2d1 + " and a " + p2d2);
            return "Player 2 Wins!!";
        }
    }
    
    @Override
    public void run()
    {
        int input = 0;
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
        scan.nextLine();
        if(input == 1)
            System.out.println(playGame1());
        else
            System.out.println(playGame2());
        
        scan.close();
    }
          
}
