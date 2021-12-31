import json
import requests
import sys
import os


def main():
os.system('clear')
os.systen('figlet TERMUX')
banner=''' 
[+]AUTHOR : TERMUX
[+]VIP : VVIP TERMUX
'''

print(banner)
no = input('target :')
import requests
import time
url = 'https://api.online2015.com/api/game/guess_odd?page=1&limit=50&type=24'
parameter = {
'page': 1,
'limit': 50,
'type': 24
}

r = requests.get(url, params=parameter).json()
daftar = r['data']
for d in daftar : 
time.sleep(1)
waktu = d['time']
angka = d['number']
keluaran = d['result']
print('Time',waktu,'Number :', angka, 'Result',keluaran)