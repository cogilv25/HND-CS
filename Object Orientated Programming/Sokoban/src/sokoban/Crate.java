/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sokoban;

/**
 *
 * @author Calum
 */
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
