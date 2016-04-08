/**
 * Created by Yasha on 09-04-2016.
 */
import java.util.*;
public class technovision {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);

        String name = "ankit jain";

        name = name + " ";

        String mobno = "8965432483";

        int l = name.length();

        int index = name.indexOf(' ');

        String id = name.charAt(0)+""+name.charAt(index+1)+""+mobno.substring(0,6);

        System.out.println(id);


    }
}
