/*======================================================
* file: Map.java
* Author: Calum Lindsay
* Created: 06/10/2021
* Last Modified: 29/04/2022
* Notes: This class loads and stores the map as an
* array of Map Elements and allows the map to be
* viewed and queried about it's current state.
========================================================*/
package sokoban;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;

class Map {
    private MapElement myMap[][];
    private int length;
    private int breadth;
    private Coord playerLocation;
    private boolean complete;
    private int noOfMoves;
    
    public Map()
    {
        //Initialise the map
        length = 0;
        breadth = 0;
        playerLocation = new Coord();
        complete = false;
        noOfMoves = 0;
    }
    
    public boolean checkForWin()
    {
        //If we have already determined the map is complete return true
        if(complete)
            return true;
        
        //If we find a Crate with anything other than a
        //diamond under it then the game isn't over.
        boolean result = true;    
        for(int y=0;y<length;y++)
            for(int x=0;x<breadth;x++)
                if(myMap[y][x].getSymbol().compareTo("C")==0 && !myMap[y][x].getIsDestination())
                    if(myMap[y][x].getUnderneath().getSymbol().compareTo("D")==0)
                        myMap[y][x].setIsDestination(true);
                    else
                        result = false;
        
        //Set complete and return the result
        return (complete = result);
    }
    
    public Coord findPlayer()
    {
        //Iterate over the map to attempt to find the player
        // and return as soon as the player is found
        for(int y = 0;y<length;y++)
            for(int x = 0;x<breadth;x++)
                if(myMap[y][x].getSymbol().compareTo("S")==0)
                {
                    playerLocation.setXCoord(x);
                    playerLocation.setYCoord(y);
                    return playerLocation;
                }
        
        
        //If we can't find the player return null
        return null;
    }
    
    public void move(int currX, int currY, int newX, int newY)
    {
        //Prevent the player pushing objects out of the playable
        // area if there are no walls to stop them
        if(newX < 0 || newY < 0 || newX >= breadth || newY >= length)
            return;
        
        //Move the element from (currX, currY) to (newX, newY),
        // the element that was at (newX, newY) to underneath
        // the moving element and, the element that was underneath
        // the moving element to (currX, currY)
        MapElement swap = myMap[currY][currX];
        myMap[currY][currX] = swap.getUnderneath();
        swap.setUnderneath(myMap[newY][newX]);
        myMap[newY][newX] = swap;
    }
    
    public void movePlayer(int dir)
    {
        int plyrX = playerLocation.getXCoord();
        int plyrY = playerLocation.getYCoord();
        
        
       //Convert a NESW direction to a 2D unit vector
        int dirY = -(dir%2)*(-dir+2);
        int dirX = ((dir-1)%2)*(-(dir-1)+2);
        
        
        //Prevent the player moving out of the playable
        // area if there are no walls to stop them
        if(plyrX+dirX < 0 || plyrY+dirY < 0 || 
            plyrX+dirX >= breadth || plyrY+dirY >= length)
            return;
        
        //Check if there is anything in front of the player
        if(myMap[plyrY+dirY][plyrX+dirX].getObs())
        {
            //If the obstacle can't be pushed do nothing
            if(!myMap[plyrY+dirY][plyrX+dirX].getCanBePushed())
                return;
            //If there is something blocking the pushable
            //object, again, do nothing
            if(myMap[plyrY+2*dirY][plyrX+2*dirX].getObs())
                return;
            //Otherwise move the obstacle one tile
            //in the direction the player is moving
            move(plyrX+dirX,plyrY+dirY,plyrX+2*dirX,plyrY+2*dirY);
        }
        
        //Move the player one tile
        move(plyrX,plyrY,plyrX+dirX,plyrY+dirY);
        playerLocation.setXCoord(plyrX+dirX);
        playerLocation.setYCoord(plyrY+dirY);
        
        //Increment number of moves 
        noOfMoves++;
    }
    
    public boolean loadMap(String mapName)
    {
        //Open the file containing the map
        InputStream stream = getClass().getResourceAsStream(mapName);
        
        //Most likely the file path is wrong if stream is null 
        if(stream == null)
            return false;
        
        //Determine the length and breadth of the map
        //and load it's contents into str.
        length = 0; //y
        breadth = 0; //x
        String str = "";
        InputStreamReader reader = new InputStreamReader(stream);
        BufferedReader buffer = new BufferedReader(reader);
        try
        {
            int c,x = 0;
            while((c = buffer.read()) != -1)
            {
                if(c!='\n')
                    ++x;
                else
                {
                    ++length;
                    breadth = Math.max(breadth,x-1);
                    x = 0;
                }
                str += (char)c;
            }
            ++length;
            breadth = Math.max(breadth,x);
            
            stream.close();
        }
        catch (IOException e)
        {
            return false;
        }
        
        //Create myMap and populate it with MapElements
        //determined by the contents of str.
        myMap = new MapElement[length][breadth];
        int y=0,x=0;
        for(int i = 0;i<str.length();i++)
        {
            switch((char)str.charAt(i))
            {
                case '\n' -> {
                    //Fill in blank areas with Floor tiles and
                    // move to the next row in the map
                    if(x!=breadth)
                        for(int j = x;j<breadth;j++)
                            myMap[y][j] = new Floor();
                    x=0;
                    y++;
                }
                //The nested switch is just for readability as
                // ++x is required for each case
                case ' ','W','F','C','D','S' -> {
                    switch((char)str.charAt(i))
                    {
                        case ' ' -> myMap[y][x] = new Floor();   
                        case 'W' -> myMap[y][x] = new Wall();
                        case 'F' -> myMap[y][x] = new Floor();
                        case 'C' -> myMap[y][x] = new Crate();
                        case 'D' -> myMap[y][x] = new Diamond();
                        case 'S' -> myMap[y][x] = new Player();
                    }
                    ++x;
                }
            }
        }
        //Fill any empty space with Floor tiles.
        if(x!=breadth)
            for(int j = x;j<breadth;j++)
                myMap[y][j] = new Floor();
        
        complete = false;
        return true;
    }
    
    public boolean isObstacleAhead(int x, int y)
    {
        return myMap[y][x].getObs();
    }
    
    public boolean isPushableObject(int x, int y)
    {
        return myMap[y][x].getCanBePushed();
    }
    
    public void resetNoMoves()
    {
        noOfMoves = 0;
    }
    
    public void setLocation(int x, int y)
    {   
        //Prevent the player from being moved outside
        // of the playable area 
        if(x < 0 || y < 0 || x >= breadth || y >= length)
            return;
        
        move(playerLocation.getXCoord(),playerLocation.getYCoord(),x,y);
        playerLocation.setXCoord(x);
        playerLocation.setYCoord(y);
    }
    
    public int getBreadth()
    {
        return breadth;
    }
    
    public int getLength()
    {
        return length;
    }
    
    public MapElement getElement(int x, int y)
    {
        return myMap[y][x];
    }
    
    public MapElement[][] getMap()
    {
        return myMap;
    }
    
    public int getNumMoves()
    {
        return noOfMoves;
    }
}
