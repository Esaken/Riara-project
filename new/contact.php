from flask import Flask, request, render_template
import smtplib

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/submit', methods=['POST'])
def submit():
    if request.method == 'POST':
        name = request.form['Name']
        email = request.form['Email']
        message = request.form['Message']

        if not name or not email or not message:
            return "Please fill all the fields."

        if "@" not in email:
            return "Please enter a valid email address."

        try:
            server = smtplib.SMTP('smtp.gmail.com', 587)
            server.ehlo()
            server.starttls()
            server.ehlo()
            server.login('youremail@gmail.com', 'yourpassword')
            server.sendmail(
                'youremail@gmail.com',
                email,
                "Subject: Form Submission\n\nName: " + name + "\nEmail: " + email + "\nMessage: " + message
            )
            server.close()
            return "Thanks for getting in touch. We'll get back to you soon."
        except:
            return "Error sending the email. Please try again later."

if __name__ == '__main__':
    app.run()
