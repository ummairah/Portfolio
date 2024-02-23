import java.io.*;
class  EmpInFile
{
    public static void main(String[] args) throws IOException {
        EmpInFile myFile = new EmpInFile() ;
        myFile.openFile("payslip.txt") ;
        myFile.closeFile() ; 
    } // end main

public void openFile(String filename) throws IOException {
    String line ;
    int numLines ;
    // open input file
    FileReader reader = new FileReader(filename) ;
    BufferedReader in = new BufferedReader(reader) ;
    numLines = 0 ;
    // read each line from the file
    line = in.readLine() ; // read first
    while (line != null)
    {
        numLines++ ;
        System.out.println(line) ; // print current
        line = in.readLine() ; // read next line
    }
    System.out.println(numLines + "lines read from file") ;
} // end openFile

public void closeFile() throws IOException {
    in.close() ;
    System.out.println("file closed") ;
    } // end closeFile
} // end class