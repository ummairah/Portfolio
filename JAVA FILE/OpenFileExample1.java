import java.awt.Desktop;  
import java.io.*;  
    public class OpenFileExample1 {  
        public static void main(String[] args) {  
        try {  
        File file = new File("C:\\demo\\demofile.txt");   
        if(!Desktop.isDesktopSupported()){  
        System.out.println("not supported");  
        return;  
    }   
    Desktop desktop = Desktop.getDesktop();  
    if(file.exists())        
    desktop.open(file);       
    }  
    catch(Exception e)  
    {  
    e.printStackTrace();  
    }  
   
}  
}  