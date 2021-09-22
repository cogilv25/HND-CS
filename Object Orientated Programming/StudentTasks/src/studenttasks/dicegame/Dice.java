/*======================================================
* file: Dice.java
* Author: Calum Lindsay
* Created: 15-09/2021
* Last Modified: 22/09/2021
* Notes: Class that represents a dice
========================================================*/
package studenttasks.dicegame;

import static java.lang.Math.random;


public class Dice {
    private int noOfFaces;
    private int currentShownFace;
    
    public Dice(int numberOfFaces)
    {
        currentShownFace = -1;
        noOfFaces = numberOfFaces;
    }
    
    public Dice(){ this(6); }
    
    public int rollDice()
    {
        //Assignment operators return the assigned value
        currentShownFace = (int) (Math.random()* 59 + 1);
        currentShownFace %= noOfFaces;
        currentShownFace++;
        return currentShownFace;
    }
    
    //Re-rolls dice if new dice has less faces
    public void setNumberOfFaces(int nFaces)
    {
        noOfFaces = nFaces;
        if(currentShownFace > noOfFaces)
            rollDice();
    }
    
    public int getNumberOfFaces(){return noOfFaces;}
    public int getCurrentShownFace(){return currentShownFace;}
}
