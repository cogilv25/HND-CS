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
