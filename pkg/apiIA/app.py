from flask import Flask, request, redirect, url_for, jsonify
import ollama

app = Flask(__name__)

def getRespone(prompt):
    response = ollama.chat(
        model = "llama3",
        total_duration = 300,
        messages = [
            {
                "role": "user",
                "content": prompt
            }
        ]
    )

    return response["message"]["content"]


@app.route('/', methods=['GET'])
def index():
    prompt = request.args.get('prompt')
    return redirect(url_for('api', prompt=prompt))


@app.route('/api', methods=['GET'])
def api():
    prompt = request.args.get('prompt')

    response = getRespone(prompt) 
    return jsonify({"text":response})

if __name__ == '__main__':
    app.run(port=5000, debug=True)
    