/*======================================================
* file: MapElement.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 06-10/2021
* Notes: This is a simple class to store information 
* about a single tile on the map.
========================================================*/
package sokoban;

class MapElement {
    private boolean canBePushed;
    private String imgFileName;
    private boolean isDestination;
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
    
    public void setX(int val)
    {
        x = val;
    }
    public void setY(int val)
    {
        y = val;
    }
}
