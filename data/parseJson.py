import json
import re

with open('./quotes.json', 'r') as file:
    data = json.load(file)

unique_words = set()

for item in data['quotes']:
    quote = item['quote']
    words = re.findall(r'\b\w+\b', quote.lower())
    unique_words.update(words)

unique_words_list = list(unique_words)

print(unique_words_list)
