/*======================================================
* file: Crate.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 29-04/2022
* Notes: This is a simple class that represents
* a Crate on the map in the game. 
========================================================*/

package sokoban;

public class Crate extends MapElement {

    public Crate() 
    {
        super.setIsDestination(false);
        setObs(true);
        setSymbol("C");
        setCanBePushed(true);
        setImgFilename("assets/MayBACrate.png");
        setUnderneath(new Floor());
    }
    
    @Override
    public void setIsDestination(boolean value)
    {
        //We will lock any crate in place that is on
        //at its destination and change it's image.
        if(isDestination = value)
        {
            setCanBePushed(false);
            setImgFilename("assets/MayBADes.png");
        }
    }
    
}
