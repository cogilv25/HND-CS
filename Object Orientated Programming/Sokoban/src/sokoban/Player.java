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
        this.setObs(false);
        this.setSymbol("S");
        this.setCanBePushed(false);
        this.setImgFilename("assets/MayBAChar.png");
        this.setUnderneath(new Floor());
    }
    
}
