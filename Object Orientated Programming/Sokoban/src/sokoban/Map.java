/*======================================================
* file: Map.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 09-02/2022
* Notes: This class loads and stores the map as an
* array of Map Elements and allows the map to be
* viewed and queried about it's current state without
* understanding the underlying implementation.
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
        
    }
    
    public boolean checkForWin()
    {
        //If we find a Crate with anything other than a
        //diamond under it then the game isn't over.
        //We will also lock any crate in place that is on
        //a diamond and change it's image.
        boolean result = true;
        for(int y=0;y<length;y++)
        {
            for(int x=0;x<breadth;x++)
            {
                if(myMap[y][x].getSymbol().compareTo("C")==0)
                {
                    if(!myMap[y][x].getIsDestination())
                    {
                        if(myMap[y][x].getUnderneath().getSymbol().compareTo("D")==0)
                        {
                            myMap[y][x].setIsDestination(true);
                            myMap[y][x].setCanBePushed(false);
                            myMap[y][x].setImgFilename("assets/MayBADes.png");
                            continue;
                        }
                        result = false;
                    }
                }
            }
        }

        return result;
    }
    
    public void displayMap()
    {
        // ??????????????????????
    }
    
    public Coord findPlayer()
    {
        for(int y = 0;y<length;y++)
            for(int x = 0;x<breadth;x++)
                if(myMap[y][x].getSymbol().compareTo("S")==0)
                {
                    playerLocation = new Coord();
                    playerLocation.setXCoord(x);
                    playerLocation.setYCoord(y);
                    return playerLocation;
                }
        //If we can't find the player return null
        return null;
    }
    
    public void move(int currX, int currY, int newX, int newY)
    {
        //Put element to move in limbo
        MapElement swap = myMap[currY][currX];
        //Replace element to move with what
        //was underneath it 
        myMap[currY][currX] = swap.getUnderneath();
        //Put the tile at the new location underneath
        //the tile we are moving
        swap.setUnderneath(myMap[newY][newX]);
        //Finally move the tile in limbo to it's
        //new position
        myMap[newY][newX] = swap;
    }
    
    public void movePlayer(int dir)
    {
        int x = playerLocation.getXCoord();
        int y = playerLocation.getYCoord();
        
        
       //Convert a NESW direction to a 2D unit vector
        int dirY = -(dir%2)*(-dir+2);
        int dirX = ((dir-1)%2)*(-(dir-1)+2);
        
        
        //Prevent player moving off the map
        if(x+dirX < 0 || y+dirY < 0 || x+dirX >= breadth || y+dirY >= length)
            return;
        
        //Check if there is anything in front of the player
        if(myMap[y+dirY][x+dirX].getObs())
        {
            //If the obstacle can't be pushed do nothing
            if(!myMap[y+dirY][x+dirX].getCanBePushed())
                return;
            //If there is something blocking the pushable
            //object again do nothing
            if(myMap[y+2*dirY][x+2*dirX].getObs())
                return;
            //Otherwise move the obstacle one tile
            //in the direction the player is facing
            move(x+dirX,y+dirY,x+2*dirX,y+2*dirY);
        }
        
        //Finally move the player one tile
        move(x,y,x+dirX,y+dirY);
  
        playerLocation.setXCoord(x+dirX);
        playerLocation.setYCoord(y+dirY);
        noOfMoves++;
    }
    
    public boolean isObstacleAhead(int x, int y)
    {
        return myMap[y][x].getObs();
    }
    
    public boolean isPushableObject(int x, int y)
    {
        return myMap[y][x].getCanBePushed();
    }
    
    public void loadMap(String mapName)
    {
        //Open the file containing the map
        InputStream stream = getClass().getResourceAsStream(mapName);
        if(stream == null)
        {
            System.out.println("Error: unable to load map file!");
            return;
        }
        InputStreamReader reader = new InputStreamReader(stream);
        BufferedReader buffer = new BufferedReader(reader);
        
        //Determine the length and breadth of the map
        //and load it's contents into the String str.
        length = 0; //y
        breadth = 0; //x
        String str = "";
        try
        {
            int c,x = 0;
            while((c = buffer.read()) != -1)
            {
                if(c=='\n')
                {
                    ++length;
                    breadth = Math.max(breadth,x-1);
                    x = 0;
                }
                else
                {
                    ++x;
                }
                str += (char)c;
            }
            ++length;
            breadth = Math.max(breadth,x);
            buffer.close();
            reader.close();
        }
        catch (IOException e)
        {
            e.printStackTrace();
        }
        
        //Create myMap and populate it with
        //the MapElements defined by str.
        myMap = new MapElement[length][breadth];
        int y=0,x=0;
        for(int i = 0;i<str.length();i++)
        {
            switch((char)str.charAt(i))
            {
                case '\n':
                    //Fill in blank areas with Floor tiles
                    if(x!=breadth)
                    {
                        for(int j = x;j<breadth;j++)
                        {
                            myMap[y][j] = new Floor();
                        }
                    }
                    x=0;
                    y++;
                break;
                case ' ': myMap[y][x] = new Floor();
                ++x;
                break;
                case 'W': myMap[y][x] = new Wall();
                ++x;
                break;
                case 'F': myMap[y][x] = new Floor();
                ++x;
                break;
                case 'C': myMap[y][x] = new Crate();
                ++x;
                break;
                case 'D': myMap[y][x] = new Diamond();
                ++x;
                break;
                case 'S': myMap[y][x] = new Player();
                ++x;
                break;
            }
        }
        //Fill any empty space with Floor tiles.
        if(x!=breadth)
        {
            for(int j = x;j<breadth;j++)
            {
                myMap[y][j] = new Floor();
            }
        }
    }
    
    public void resetNoMoves()
    {
        noOfMoves = 0;
    }
    
    public void setBreadth(int b)
    {
        breadth = b;
    }
    
    public void setLength(int l)
    {
        length = l;
    }
    
    public void setLocation(int x, int y)
    {
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
