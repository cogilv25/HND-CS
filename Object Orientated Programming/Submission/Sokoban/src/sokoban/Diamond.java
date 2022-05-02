/*======================================================
* file: Diamond.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 12-01/2022
* Notes: This is a simple class that represents
* a Diamond on the map in the game. 
========================================================*/

package sokoban;

public class Diamond extends MapElement {

    public Diamond() 
    {
        this.setObs(false);
        this.setSymbol("D");
        this.setCanBePushed(false);
        this.setImgFilename("assets/MayBADim2.png");
    }
    
}
