import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/login")
public class LoginServlet extends HttpServlet {
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String username = request.getParameter("username");
        String password = request.getParameter("password");

        response.setContentType("text/html;charset=UTF-8");
        if ("admin".equals(username) && "admin".equals(password)) {
            response.getWriter().println("<h1>Login bem-sucedido!</h1>");
        } else {
            response.getWriter().println("<h1>Login inválido!</h1>");
            response.getWriter().println("<a href='login.jsp'>Tentar novamente</a>");
        }
    }
}
