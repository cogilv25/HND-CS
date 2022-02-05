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
public class Diamond extends MapElement {

    public Diamond() 
    {
        this.setObs(false);
        this.setSymbol("D");
        this.setCanBePushed(false);
        this.setImgFilename("assets/MayBADim2.png");
    }
    
}
