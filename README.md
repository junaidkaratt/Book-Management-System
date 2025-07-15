## Book management system setup <br>
INSTRUCTIONS:<br>
1. Clone the Repository & Install Dependencies<br>
Open your terminal and run:<br>
• git clone https://github.com/junaidkaratt/Book-Management-System.git<br>
• cd Book-Management-System<br>
• composer install<br>
• npm install<br>
• npm run dev<br>
keep the terminal running<br><br>
2. Configure the Environment<br>
In a new terminal, navigate to the project directory :<br>
• make a copy of the .env.example file and rename it to .env (if you are
using Git Bash you can run :cp .env.example .env)<br>
• php artisan key:generate<br><br>
3. Set Up the Database<br>
• Create a SQLite database file at the following path:<br>
database/database.sqlite<br><br>
4. Run Migrations & Seed the Database<br>
• php artisan migrate –seed<br><br>
5. Start the Application<br>
• php artisan serve<br><br>
application should now be running at: http://localhost:8000
