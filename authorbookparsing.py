from lxml import html
authorandbook = tree.xpath('//span[@itemprop="name"]/text()')
print authorandbook


#this gives us a list
# trying to make this a csv
#>>> with open('authorbook', 'wb') as myfile:
#...     wr.writerow(authorandbook)
#...     wr = csv.writer(myfile, quoting=csv.QUOTE_NONE)
#...
#Traceback (most recent call last):
#  File "<stdin>", line 2, in <module>
#UnicodeEncodeError: 'ascii' codec can't encode characters in position 14-16: ordinal not in range(128)

# >>> for i in authorandbook:
# ...     print authorandbook[i].encode('utf-8')
# ...
# Traceback (most recent call last):
#   File "<stdin>", line 2, in <module>
# TypeError: list indices must be integers, not _ElementStringResult