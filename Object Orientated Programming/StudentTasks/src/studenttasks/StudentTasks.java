/*======================================================
* file: StudentTasks.java
* Author: Calum Lindsay
* Created: 15-09/2021
* Last Modified: 15/09/2021
* Notes: Runs tutorial tasks in order of completion.
* Really just to organise the tasks in a single project.
* I skipped a couple of the extremely simple tasks.
========================================================*/
package studenttasks;

public class StudentTasks {

    public static void main(String[] args) {
        //I like some Polymorphism with my tea in the morning. I would
        //like some raw pointers too but Java is greedy and hides them!
        Task tasks[] = {new SquareAndSquareRoot(), new HourChecker(),
        new studenttasks.dicegame.DiceGame()};
        for(Task t : tasks)
        {
            System.out.println("Start " + t.getName() + " task...");
            t.run();
            System.out.println(t.getName() + " task has stopped.\n\n");
        }
    }
    
}
