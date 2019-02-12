/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package main;

import java.net.*;
import java.io.*;
import java.sql.SQLException;
import java.text.ParseException;
import java.util.logging.Level;
import java.util.logging.Logger;
import models.Proximidad;

/**
 *
 * @author ferna
 */
public class Main extends Thread{
   private ServerSocket serverSocket;
        InputStream br=null;
        DataOutputStream pw=null;
        int receivePort;                // port to receive  from
        boolean threadRunning = true;   // flag to terminate thread

        Main(int receivePort)    // constructor to receive datagrams on port receivePort
    {
            this.receivePort = receivePort;
    }

        // terminate the thread by setting flag
        public void stopTCPserver()
        {
            threadRunning = false;
        }
 

        public void run()                // thread run method, receives and buffers datagrams
        {
          Socket socket=null;
          int frame=0;
          try
              {
              while (threadRunning)
              {
                  Thread.sleep(10);
                  System.out.println("TCP  server starting: IP address " 
                       + InetAddress.getLocalHost().toString() + " port " + receivePort );
                  serverSocket = new ServerSocket(receivePort);
                  socket = serverSocket.accept(); // Wait for client to connect.
                  System.out.println("Client connect from IP address " + socket.getInetAddress()
                                  + " port " + socket.getPort());
                  br  = ( ( socket.getInputStream() ) );
                  pw = new DataOutputStream( socket.getOutputStream() );
                  //while(threadRunning)
                    try
                    {
                      byte data[]=new byte[10000];
                      int length = br.read(data);
                      String text = new String(data, "UTF-8");
                     System.out.println("\n" + text + "aqui");
                     Proximidad cajon = new Proximidad(text);
                        System.out.println("aqui");
                     boolean bandera = cajon.add();
                     System.out.println(bandera);
                     boolean updateCajon = cajon.updateCajon();
                        System.out.println(bandera);
                        //System.out.println(updateCajon);
                        Thread.sleep(10);
                      pw.flush();
                     }
                    catch (Exception se) {System.err.println("done"); break;}
                  serverSocket.close();
                  Thread.sleep(10);
                }
              }
          catch (Exception se) {System.err.println("run() " + se); }
     
         // System.exit(1);                                                 // exit on failure
        }
    
    public static void main(String [] args){
          int receivePort=10000;//999;//20000;                                 // port to receive datagrams on
        Main frameInput = new Main(receivePort);    // create server to receive messages
        frameInput.start();                                   // and start it
        System.out.println("ready to receive from socket " + receivePort);
    }
}
