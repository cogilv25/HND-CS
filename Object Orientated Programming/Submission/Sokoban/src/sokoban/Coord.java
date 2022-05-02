/*======================================================
* file: Coord.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 06-10/2021
* Notes: This is a simple class to represent a
* coordinate in 2D space
========================================================*/
package sokoban;

class Coord {
    private int x;
    private int y;
    
    public Coord()
    {
        x=0;
        y=0;
    }
    
    public int getXCoord()
    {
        return x;
    }
    
    public int getYCoord()
    {
        return y;
    }
    
    public void setXCoord(int newX)
    {
        x = newX;
    }
    public void setYCoord(int newY)
    {
        y = newY;
    }
    
}
