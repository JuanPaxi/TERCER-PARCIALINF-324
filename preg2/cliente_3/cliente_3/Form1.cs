using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace cliente_3
{
    public partial class Form1 : Form
    {
        String id;

        public Form1()
        {
            InitializeComponent();
            MostrarDatos();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            String nom, ape, fecha;
            ServiceReference2.WebService1SoapClient sr = new ServiceReference2.WebService1SoapClient();
            int prom;
            nom = textBox1.Text;
            ape = textBox2.Text;

            fecha = textBox3.Text;

            if (fecha.Length <= 10)
            {
                Console.WriteLine("fecha valida");
            }
            else
            {
                Console.WriteLine("La fecha no pasa mas de 10 caracteres");

            }

            prom = Convert.ToInt32(textBox4.Text);


            String res = sr.insertar(nom, ape, fecha, prom);
            Console.WriteLine(res);
            MostrarDatos();
        }


        private void MostrarDatos()
        {

            ServiceReference2.WebService1SoapClient sr = new ServiceReference2.WebService1SoapClient();
            DataSet dataSet = new DataSet();
            dataSet = sr.datos();
            dataGridView1.DataSource = null;
            dataGridView1.DataSource = dataSet.Tables["alumno"];
        }
        //ACTUALIZAR
        private void button4_Click(object sender, EventArgs e)
        {
            ServiceReference2.WebService1SoapClient ws = new ServiceReference2.WebService1SoapClient();
            String nom, ape, fecha, iden;
            int prom;
            nom = textBox1.Text;
            ape = textBox2.Text;
            fecha = textBox3.Text;
            prom = Convert.ToInt32(textBox4.Text);
            iden = id;
            String res = ws.actualizar(nom, ape, fecha, prom, iden);
            Console.WriteLine(res);
            MostrarDatos();
        }

        //ELIMINAR
        private void button3_Click(object sender, EventArgs e)
        {
            ServiceReference2.WebService1SoapClient ws = new ServiceReference2.WebService1SoapClient();
            String res = ws.eliminar(id);
            Console.WriteLine(res);
            MostrarDatos();
            textBox1.Text = ""; textBox2.Text = ""; textBox3.Text = ""; textBox4.Text = "";
        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            if (e.RowIndex >= 0 && e.RowIndex < dataGridView1.Rows.Count)
            {
                DataGridViewRow row = dataGridView1.Rows[e.RowIndex];
                textBox1.Text = row.Cells["nombre"].Value.ToString(); // Reemplaza "nombre" con el nombre real de la columna en tu tabla
                textBox2.Text = row.Cells["apellido"].Value.ToString(); // Reemplaza "apellido" con el nombre real de la columna en tu tabla
                textBox3.Text = ((DateTime)row.Cells["fecha_nacimiento"].Value).ToString("yyyy-MM-dd");
                // Reemplaza "fecha" con el nombre real de la columna en tu tabla
                textBox4.Text = row.Cells["promedio"].Value.ToString(); // Reemplaza "promedio" con el nombre real de la columna en tu tabla
                id = row.Cells["id_alumno"].Value.ToString();

            }
        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }
    }
}
