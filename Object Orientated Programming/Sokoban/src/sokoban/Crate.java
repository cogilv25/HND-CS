/*======================================================
* file: Crate.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 12-01/2022
* Notes: This is a simple class that represents
* a Crate on the map in the game. 
========================================================*/

package sokoban;

public class Crate extends MapElement {

    public Crate() 
    {
        this.setObs(true);
        this.setSymbol("C");
        this.setCanBePushed(true);
        this.setImgFilename("assets/MayBACrate.png");
        this.setIsDestination(false);
        this.setUnderneath(new Floor());
    }
    
}
