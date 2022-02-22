/*======================================================
* file: Crate.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 12-01/2022
* Notes: This is a simple class that represents
* a Wall on the map in the game. 
========================================================*/
package sokoban;

public class Wall extends MapElement {
    
    public Wall()
    {
        this.setObs(true);
        this.setSymbol("W");
        this.setCanBePushed(false);
        this.setImgFilename("assets/mayBAWall.png");
    }
    
}
