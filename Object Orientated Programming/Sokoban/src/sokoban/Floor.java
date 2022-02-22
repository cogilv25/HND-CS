/*======================================================
* file: Floor.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 12-01/2022
* Notes: This is a simple class that represents
* a Floor tile on the map in the game. 
========================================================*/
package sokoban;

/**
 *
 * @author Calum
 */
public class Floor extends MapElement {

    public Floor() 
    {
        this.setObs(false);
        this.setSymbol("F");
        this.setCanBePushed(false);
        this.setImgFilename("assets/mayBAFloor.png");
    }
    
}
