/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package models;

import MySql.MySqlConnection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Timestamp;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import org.json.JSONException;
import org.json.JSONObject;

/**
 *
 * @author ferna
 */
public class Proximidad {
     //objetos
    private static PreparedStatement command;
    private static ResultSet result;
    
    private int estado;
    private Date fecha;
    private Timestamp hora;
    private int cajon;


    public int getEstado() {
        return estado;
    }

    public void setDisponible(int estado) {
        this.estado = estado;
    }

    public Date getFecha() {
        return fecha;
    }

    public void setFecha(Date fecha) {
        this.fecha = fecha;
    }
    
    public int getCajon(){
        return this.cajon;
    }
    
    public void setCajon(int cajon){
        this.cajon = cajon;
    }


    public Proximidad(int estado, Date date, Timestamp hora, int cajon) {
        this.estado = estado;
        this.fecha = date;
        this.hora = hora;
        this.cajon = cajon;
    }
    
    public Proximidad(String data) throws ParseException, SQLException{
        try
        {
            String dateNow = ""+getHora();
            JSONObject object = new JSONObject(data);
            this.estado = object.getInt("Estado");
            //this.fecha = 
            //this.hora  = Timestamp.valueOf(dateNow);
            this.cajon = object.getInt("Cajon");
        }
        catch(JSONException ex){
             System.out.println(ex);
        } 
    }
    
    public Boolean add(){
        String dia = ""+getDia();
        String hora = ""+getHora();
        
        String query = "INSERT INTO estadisticasCajones(estCaj_cajon_id, estCaj_fecha, estCaj_hora, estCaj_disponible) VALUES "
            + "(?,?,?,?)";
        //System.out.println(query);
            try{
                System.out.println(MySqlConnection.getConnection());
            command = MySqlConnection.getConnection().prepareStatement(query);
            command.setInt(1, this.cajon);
            command.setString(2, dia); //aqui haremos un split a la fecha que llege
            command.setTimestamp(3, Timestamp.valueOf(hora));//aqui haremos un split a la fecha que llege
        System.out.println(query);    
            if(this.estado == 1) this.estado = 2;
            else this.estado = 1;
            
            command.setInt(4, this.estado);
                System.out.println(query);
            command.executeUpdate(); 
            command.close();
            
            }catch(SQLException ex){
                System.out.println(ex);
                ex.printStackTrace();
            }
            return true;
        
    }
    
    public Boolean updateCajon(){
         
            try{
                //if(this.estado == 1) this.estado = 2;
                //else this.estado = 1;

                //command.setInt(1, this.estado);
                //command.setInt(2, this.cajon);
                String query = "update cajones set cajones.caj_status_id = " + this.estado + " where cajones.caj_id = " + this.cajon;
                    System.out.println(query);
                command = MySqlConnection.getConnection().prepareStatement(query);
                command.executeUpdate(); 
                command.close();
            
            }catch(SQLException ex){
                //System.out.println(ex);
                ex.printStackTrace();
            }
            return true;
    }
    private static java.sql.Timestamp getHora() {
	java.util.Date today = new java.util.Date();
	return new java.sql.Timestamp(today.getTime());
    }
    private static String getDia() {
	//java.util.Date today = new java.util.Date();
        Calendar calendario = Calendar.getInstance();
        String dia = Integer.toString(calendario.get(Calendar.DATE));
        String mes = Integer.toString(calendario.get(Calendar.MONTH));
        String anio = Integer.toString(calendario.get(Calendar.YEAR));
        String hoy = anio + "-" + mes + "-" + dia;
	return hoy;
    }
}
