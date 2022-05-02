/*======================================================
* file: Game.java
* Author: Calum Lindsay
* Created: 06-10/2021
* Last Modified: 29-04/2022
* Notes: This is the main Game class. 
* The entry point for the program and the game
* logic is contained within this class.
========================================================*/


/*
* Control Scheme:
* WASD/Arrow keys: move character
* R: reset the current level
* Enter: move to next level if level is complete
* Escape: exit the game
*/

package sokoban;

import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import java.io.IOException;
import java.util.HashMap;
import javax.imageio.ImageIO;
import javax.swing.ImageIcon;
import javax.swing.JLabel;

public class Game extends javax.swing.JFrame implements KeyListener {

    private boolean complete;
    private int level;
    private String mapNames[];
    private HashMap<String,ImageIcon> imageHashMap;
    private JLabel myElements[][];
    private Map tmpMap;
    
    ImageIcon getImage(String filename)
    {
        //If the image filename requested is not loaded
        // into imageHashMap then load it from file
        // otherwise return the image.
        if(imageHashMap.get(filename)==null)
        {
            //Check that the filename exists otherwise
            // attempt to load the error image
            var stream = getClass().getResourceAsStream(filename);
            if(stream == null)
            {
                lbl_moves.setText("Error: unable to load image file! | Game Over!!!");
                complete = true;
                if(!filename.equals("assets/error.png"))
                    return getImage("assets/error.png");
                else
                    return null;
            }

            try
            {
                //Attempt to load the image data into a new ImageIcon
                // in imageHashMap using the filename as the key
                imageHashMap.put(filename, new ImageIcon(ImageIO.read(stream)));
                stream.close();
            }
            catch(IOException e)
            {
                //If an error occurs loading the image
                // attempt to load the error image
                lbl_moves.setText("Error: unable to load image file! | Game Over!!!");
                complete = true;
                if(!filename.equals("assets/error.png"))
                    return getImage("assets/error.png");
                else
                    return null;
            }
        }
        
        //If the image is not the correct size load the error image
        if(imageHashMap.get(filename).getIconHeight() != 32 ||
            imageHashMap.get(filename).getIconWidth() != 32)
        {
            lbl_moves.setText("Error: image files must be 32x32px! | Game Over!!!");
                complete = true;
                if(!filename.equals("assets/error.png"))
                    return getImage("assets/error.png");
                else
                    return null;
        }
        
        return imageHashMap.get(filename);
    }
    
    public void drawMap()
    {
        //Update the myElements array with the current
        // state of tmpMap
        for(int i = 0; i<tmpMap.getLength();i++)
            for(int j=0;j<tmpMap.getBreadth();j++)
                myElements[i][j].setIcon(getImage(tmpMap.getElement(j,i).getImgFilename()));
    }
    
    public boolean loadLevel(int level)
    {
        //If we are unable to load the map display a
        // message and the game is over.
        if(!tmpMap.loadMap(mapNames[level]))
        {
            lbl_moves.setText("Error: unable to load map file! | Game Over!!!");
            complete = true;
            return false;
        }
        //If we are unable to find the player display a
        // message and the game is over.
        if(tmpMap.findPlayer() == null)
        {
            
            lbl_moves.setText("Error: map doesn't contain a player | Game Over!!!");
            complete = true;
            return false;
        }
        
        //Check for maps that are too small or large,
        // display an error message and end the game
        if(tmpMap.getBreadth() < 4 || tmpMap.getLength() < 4)
        {
            lbl_moves.setText("Error: map min size is 4x4 tiles | Game Over!!!");
            complete = true;
                return false;
        }
        
        if(tmpMap.getBreadth() > 30 || tmpMap.getLength() > 30)
        {
            lbl_moves.setText("Error: map max size is 30x30 tiles | Game Over!!!");
            complete = true;
            return false;
        }
        
        refreshWindowLayout();
        return true;
    }
    
    public void refreshWindowLayout()
    {
        int length = tmpMap.getLength(), breadth = tmpMap.getBreadth();
        
        //Reset and resize window and components as needed
        // a little bit of magic numbers are used here 
        // to make things line up nicely
        southPanel.setPreferredSize(new java.awt.Dimension(breadth*32+20, 20));
        this.setPreferredSize(new java.awt.Dimension(breadth*32+20,length*33+50));
        centrePanel.setLayout(new java.awt.GridLayout(length, breadth));
        pack();
        
        //Rebuild myElements and the centrePanel's
        // grid layout for the new map.
        myElements = new JLabel[length][breadth];
        centrePanel.removeAll();
        for(int i=0;i<length;i++)
            for(int j=0;j<breadth;j++)
            {
                myElements[i][j] = new JLabel();
                centrePanel.add(myElements[i][j]);
            }
    }
    
    public Game() {
        //Configure the window
        initComponents();
        this.setResizable(false);
        this.addKeyListener(this);
        this.setFocusable(true);
        this.setTitle("Sokoban");
        
        //Initialise game state
        level = 0;
        complete = false;
        this.tmpMap = new Map();
        imageHashMap = new HashMap<>();
        mapNames = new String[5];
        
        //Initialise mapNames
        for(int i=0;i<mapNames.length;i++)
            mapNames[i] = "Map" + i + ".map";
        
        //Load the first level and call refreshWindowLayout for
        // the first time to configure the grid layout
        
        loadLevel(level);
        drawMap();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        southPanel = new javax.swing.JPanel();
        lbl_moves = new javax.swing.JLabel();
        centrePanel = new javax.swing.JPanel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        getContentPane().setLayout(new java.awt.BorderLayout());

        southPanel.setBorder(javax.swing.BorderFactory.createEtchedBorder());
        southPanel.setPreferredSize(new java.awt.Dimension(400, 15));

        lbl_moves.setText("R: Retry | Enter: Next Map (If complete) | WASD/Arrows: Movement");

        javax.swing.GroupLayout southPanelLayout = new javax.swing.GroupLayout(southPanel);
        southPanel.setLayout(southPanelLayout);
        southPanelLayout.setHorizontalGroup(
            southPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(lbl_moves, javax.swing.GroupLayout.DEFAULT_SIZE, 396, Short.MAX_VALUE)
        );
        southPanelLayout.setVerticalGroup(
            southPanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(southPanelLayout.createSequentialGroup()
                .addComponent(lbl_moves)
                .addGap(0, 0, Short.MAX_VALUE))
        );

        getContentPane().add(southPanel, java.awt.BorderLayout.PAGE_END);

        centrePanel.setPreferredSize(new java.awt.Dimension(400, 400));

        javax.swing.GroupLayout centrePanelLayout = new javax.swing.GroupLayout(centrePanel);
        centrePanel.setLayout(centrePanelLayout);
        centrePanelLayout.setHorizontalGroup(
            centrePanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 400, Short.MAX_VALUE)
        );
        centrePanelLayout.setVerticalGroup(
            centrePanelLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGap(0, 285, Short.MAX_VALUE)
        );

        getContentPane().add(centrePanel, java.awt.BorderLayout.CENTER);

        pack();
    }// </editor-fold>//GEN-END:initComponents

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Game.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Game.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Game.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Game.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(() -> {
            new Game().setVisible(true);
        });
    }

    @Override
    public void keyPressed(KeyEvent e) {
        if(!complete)
        {
            if(!tmpMap.checkForWin())
            {
                //Player movement
                switch(e.getKeyCode())
                {
                    case KeyEvent.VK_W, KeyEvent.VK_UP -> tmpMap.movePlayer(1);
                    case KeyEvent.VK_S, KeyEvent.VK_DOWN -> tmpMap.movePlayer(3);
                    case KeyEvent.VK_A, KeyEvent.VK_LEFT -> tmpMap.movePlayer(4);
                    case KeyEvent.VK_D, KeyEvent.VK_RIGHT -> tmpMap.movePlayer(2);
                }
                
                lbl_moves.setText("Level " + (level+1) + "/" + mapNames.length + " | Moves: " + tmpMap.getNumMoves());
                
                //If player movement has caused the level
                // to now be complete display a congratulatory message
                if(tmpMap.checkForWin())
                {
                    //If the level is the last level then the game is over
                    if(level == mapNames.length-1)
                    {
                        complete = true;
                        lbl_moves.setText("Completed in " + tmpMap.getNumMoves() + " moves! | Game Over!!!");
                    }
                    else
                    {
                        lbl_moves.setText("Completed in " + tmpMap.getNumMoves() + " moves!");
                    }
                }
            }
            //If enter is pressed, the game isn't over and
            // the level is complete then load the next map 
            else if (e.getKeyCode()== KeyEvent.VK_ENTER)
            {
                ++level;
                tmpMap.resetNoMoves();
                 if(loadLevel(level))
                    lbl_moves.setText("Level " + (level+1) + "/" + mapNames.length + " | Moves: " + tmpMap.getNumMoves());
                 
            }
        }
        
        //Attempt to reload and reset the current
        // level/map if R is pressed
        if(e.getKeyCode() == KeyEvent.VK_R)
        {
            complete = false;
            tmpMap.resetNoMoves();
            
            //If we are unable to load the map display a
            // message and the game is over.
            if(loadLevel(level))
                lbl_moves.setText("Level " + (level+1) + "/" + mapNames.length + " | Moves: " + tmpMap.getNumMoves());
        }
        //Close the game if escape is pressed
        if(e.getKeyCode() == KeyEvent.VK_ESCAPE)
        {
            this.dispose();
        }
        
        drawMap();
    }

    //Unused but required KeyListener Functions
    @Override
    public void keyTyped(KeyEvent e) {}
    @Override
    public void keyReleased(KeyEvent e) {}

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JPanel centrePanel;
    private javax.swing.JLabel lbl_moves;
    private javax.swing.JPanel southPanel;
    // End of variables declaration//GEN-END:variables
}
