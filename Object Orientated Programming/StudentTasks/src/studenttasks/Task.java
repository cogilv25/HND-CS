/*======================================================
* file: Task.java
* Author: Calum Lindsay
* Created: 15-09/2021
* Last Modified: 15/09/2021
* Notes: Base class for Student Tasks to extend
========================================================*/
package studenttasks;

public class Task {
    private String name;
    public void run(){}
    public String getName()
    {
        return name;
    }
    protected void setName(String name)
    {
        this.name = name;
    }
}
