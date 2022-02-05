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
public class Floor extends MapElement {

    public Floor() 
    {
        this.setObs(false);
        this.setSymbol("F");
        this.setCanBePushed(false);
        this.setImgFilename("assets/mayBAFloor.png");
    }
    
}
