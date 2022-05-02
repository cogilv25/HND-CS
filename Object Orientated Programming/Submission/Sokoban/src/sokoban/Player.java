/*======================================================
* file: Player.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 12-01/2022
* Notes: This is a simple class that represents
* a Player on the map in the game. 
========================================================*/

package sokoban;

public class Player extends MapElement {

    public Player() 
    {
        setObs(false);
        setSymbol("S");
        setCanBePushed(false);
        setImgFilename("assets/MayBAChar.png");
        setUnderneath(new Floor());
    }
    
}
