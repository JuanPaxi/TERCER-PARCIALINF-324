using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Services;

using System.Data;
using System.Data.SqlClient;

namespace examen3
{
    /// <summary>
    /// Descripción breve de WebService1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // Para permitir que se llame a este servicio web desde un script, usando ASP.NET AJAX, quite la marca de comentario de la línea siguiente. 
    // [System.Web.Script.Services.ScriptService]
    public class WebService1 : System.Web.Services.WebService
    {

        string conex = "Data Source=(local);Initial Catalog=inf324;Integrated Security=True;";
        [WebMethod]
        public string HelloWorld()
        {
            return "Hola a todos";
        }
        [WebMethod]

        //metodo muestra de datos 
        public DataSet datos()
        {
            string query = "SELECT * FROM alumno";
            using (SqlConnection connection = new SqlConnection(conex))
            {
                connection.Open();
                SqlCommand command = new SqlCommand(query, connection);
                SqlDataAdapter dataAdapter = new SqlDataAdapter(command);
                DataSet dataSet = new DataSet();
                dataAdapter.Fill(dataSet, "alumno");
                connection.Close();
                return dataSet;
            }
        }
        [WebMethod]

        //insertando datos
        public String insertar(String nom, String ape, String fecha, int prom)
        {
            string query = "INSERT INTO alumno VALUES ('" + nom + "','" + ape + "'," + prom.ToString() + ",'" + fecha + "')";
            using (SqlConnection connection = new SqlConnection(conex))
            {
                connection.Open();
                SqlCommand command = new SqlCommand(query, connection);
                command.ExecuteNonQuery();
                connection.Close();
                return "Dato insertado";
            }
        }

        static bool EsFechaValida(string cadenaFecha, string formato)
        {

            return true;
        }

        [WebMethod]
        public String actualizar(String nom, String ape, String fec, int prom, String id)
        {
            if (EsFechaValida(fec, "yyyy-MM-dd"))
            {
                if (nom != "" && ape != "")
                {

                    string query = "UPDATE alumno SET nombre = '" + nom + "', apellido = '" + ape + "', fecha_nacimiento = '" + fec + "', promedio = " + prom.ToString() + " WHERE id_alumno = " + id;
                    using (SqlConnection connection = new SqlConnection(conex))
                    {
                        connection.Open();
                        SqlCommand command = new SqlCommand(query, connection);
                        command.ExecuteNonQuery();
                        connection.Close();
                        return "Exito";
                    }

                }
                else
                    return "Datos en blanco";
            }
            else
                return "Fecha incorrecta";
        }
        [WebMethod]


        public String eliminar(String id)
        {
            String query = "delete from alumno where id_alumno = " + id;
            using (SqlConnection connection = new SqlConnection(conex))
            {
                connection.Open();
                SqlCommand command = new SqlCommand(query, connection);
                command.ExecuteNonQuery();
                connection.Close();
                return "Dato Eliminado";
            }
        }
    }
}
