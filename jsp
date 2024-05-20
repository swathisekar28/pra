5)	JSP
●	Develop a web application using JSP that allows users to view, add, edit, and delete employee records 
stored in a database. Include fields such as name, department, position, and salary.
✔	Add a feature to display the total number of employees currently listed.
✔	Implement a basic employee profile page showing individual employee details.
✔	Include a "New Employee" button for easier addition of new employee records.
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.util., java.sql." %>
<%@ page import="DBUtil" %>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
</head>
<body>
    <h1>Employee List</h1>
    <a href="newEmployee.jsp">New Employee</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        <%
            Connection conn = DBUtil.getConnection();
            Statement stmt = conn.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT * FROM employees");
            int count = 0;
            while (rs.next()) {
                count++;
        %>
        <tr>
            <td><%= rs.getInt("id") %></td>
            <td><a href="employee.jsp?id=<%= rs.getInt("id") %>"><%= rs.getString("name") %></a></td>
            <td><%= rs.getString("department") %></td>
            <td><%= rs.getString("position") %></td>
            <td><%= rs.getDouble("salary") %></td>
            <td>
                <a href="editEmployee.jsp?id=<%= rs.getInt("id") %>">Edit</a>
                <a href="deleteEmployee?id=<%= rs.getInt("id") %>">Delete</a>
            </td>
        </tr>
        <%
            }
        %>
    </table>
    <p>Total Employees: <%= count %></p>
</body>
</html>

<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
    <title>New Employee</title>
</head>
<body>
    <h1>New Employee</h1>
    <form action="addEmployee" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>
        <label for="department">Department:</label>
        <input type="text" id="department" name="department"><br>
        <label for="position">Position:</label>
        <input type="text" id="position" name="position"><br>
        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary"><br>
        <button type="submit">Add Employee</button>
    </form>
</body>
</html>


<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.util., java.sql." %>
<%@ page import="DBUtil" %>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <%
        int id = Integer.parseInt(request.getParameter("id"));
        Connection conn = DBUtil.getConnection();
        PreparedStatement stmt = conn.prepareStatement("SELECT * FROM employees WHERE id=?");
        stmt.setInt(1, id);
        ResultSet rs = stmt.executeQuery();
        if (rs.next()) {
    %>
    <form action="updateEmployee" method="post">
        <input type="hidden" name="id" value="<%= rs.getInt("id") %>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<%= rs.getString("name") %>"><br>
        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="<%= rs.getString("department") %>"><br>
        <label for="position">Position:</label>
        <input type="text" id="position" name="position" value="<%= rs.getString("position") %>"><br>
        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" value="<%= rs.getDouble("salary") %>"><br>
        <button type="submit">Update Employee</button>
    </form>
    <% } %>
</body>
</html>


<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.util., java.sql." %>
<%@ page import="DBUtil" %>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Profile</title>
</head>
<body>
    <h1>Employee Profile</h1>
    <%
        int id = Integer.parseInt(request.getParameter("id"));
        Connection conn = DBUtil.getConnection();
        PreparedStatement stmt = conn.prepareStatement("SELECT * FROM employees WHERE id=?");
        stmt.setInt(1, id);
        ResultSet rs = stmt.executeQuery();
        if (rs.next()) {
    %>
    <p>ID: <%= rs.getInt("id") %></p>
    <p>Name: <%= rs.getString("name") %></p>
    <p>Department: <%= rs.getString("department") %></p>
    <p>Position: <%= rs.getString("position") %></p>
    <p>Salary: <%= rs.getDouble("salary") %></p>
    <% } %>
</body>
</html>
import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/addEmployee")
public class AddEmployeeServlet extends HttpServlet {
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String name = request.getParameter("name");
        String department = request.getParameter("department");
        String position = request.getParameter("position");
        String salary = request.getParameter("salary");

        try {
            Connection conn = DBUtil.getConnection();
            PreparedStatement stmt = conn.prepareStatement("INSERT INTO employees (name, department, position, salary) VALUES (?, ?, ?, ?)");
            stmt.setString(1, name);
            stmt.setString(2, department);
            stmt.setString(3, position);
            stmt.setString(4, salary);
            stmt.executeUpdate();
        } catch (Exception e) {
            e.printStackTrace();
        }

        response.sendRedirect("index.jsp");
    }
}
●	Create a web application where users can manage student records. Allow users to add, edit, and delete student information including name, ID, courses, and grades.
✔	Calculate and display the average grade for each student based on their course grades.
✔	Implement a feature to filter students by their course enrollment or grade range.
✔	Add a summary view to display overall class statistics such as average grades and highest/lowest scores
