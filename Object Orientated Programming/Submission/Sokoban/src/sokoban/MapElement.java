/*======================================================
* file: MapElement.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 29-04/2022
* Notes: This is a simple class to store information 
* about a single tile in a map.
========================================================*/

package sokoban;

class MapElement {
    private boolean canBePushed;
    private String imgFileName;
    protected boolean isDestination;
    private boolean obs;
    private String symbol;
    private MapElement underneath;
    private int x;
    private int y;
    
    
    public MapElement() 
    {
        underneath = this;
    }
    
    public boolean getCanBePushed()
    {
        return canBePushed;
    }
    
    public String getImgFilename()
    {
        return imgFileName;
    }
    
    public boolean getIsDestination()
    {
        return isDestination;
    }
    
    public boolean getObs()
    {
        return obs;
    }
    
    public String getSymbol()
    {
        return symbol;
    }
    
    public MapElement getUnderneath()
    {
        return underneath;
    }
    
    public int getX()
    {
        return x;
    }
    
    public int getY()
    {
        return y;
    }
    
    public void setCanBePushed(boolean value)
    {
        canBePushed = value;
    }
    
    public void setImgFilename(String fileName)
    {
        imgFileName = fileName;
    }
    
    public void setIsDestination(boolean value)
    {
        isDestination = value;
    }
    
    public void setObs(boolean value)
    {
        obs = value;
    }
    
    public void setSymbol(String s)
    {
        symbol = s;
    }
    
    public void setUnderneath(MapElement u)
    {
        underneath = u;
    }
    
    public void setX(int value)
    {
        x = value;
    }
    public void setY(int value)
    {
        y = value;
    }
}
