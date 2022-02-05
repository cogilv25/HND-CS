/*======================================================
* file: Wall.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 06-10/2021
* Notes: This is a MapElement that prevents the Player
* from moving onto the same tile as it.
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
