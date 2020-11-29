FROM tiangolo/uwsgi-nginx-flask:python3.8
RUN pip install torch==1.7.0+cpu torchvision==0.8.1+cpu torchaudio==0.7.0 -f https://download.pytorch.org/whl/torch_stable.html
COPY ./app /app/
RUN pip install -r requirements.txt
