/*======================================================
* file: SquareAndSquareRoot.java
* Author: Calum Lindsay
* Created: 15-09/2021
* Last Modified: 15/09/2021
* Notes: Outputs the square and square root of 1-9 in
* order.
========================================================*/
package studenttasks;

import java.time.LocalDateTime;

public class HourChecker extends Task {
    public HourChecker()
    {
        this.setName("Hour Checker");
    }
    @Override
    public void run()
    {
        int hour = LocalDateTime.now().getHour();
        if(hour < 12)
        {
            System.out.println("Good Morning!");
        }
        else if( hour < 18)
        {
            System.out.println("Good Afternoon!");
        }
        else
        {
            System.out.println("Good Evening!");
        }
    }
}
