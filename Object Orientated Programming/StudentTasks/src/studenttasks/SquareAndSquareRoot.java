/*======================================================
* file: SquareAndSquareRoot.java
* Author: Calum Lindsay
* Created: 15-09/2021
* Last Modified: 15/09/2021
* Notes: Outputs the square and square root of 1-9 in
* order.
========================================================*/
package studenttasks;

public class SquareAndSquareRoot extends Task {
    
    public SquareAndSquareRoot()
    {
        this.setName("Square and Square Root");
    }
   @Override
    public void run()
    {
        for(int i=1; i< 10; i++)
        {
            System.out.println("the number is " + i + ", its square is: " +
                java.lang.Math.pow(i,2) + " and it's root is " + 
                java.lang.Math.sqrt((double)i));
        }
    }
}
