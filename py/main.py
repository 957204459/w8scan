#!/usr/bin/env python
# -*- coding: utf-8 -*-
import urllib,hashlib,Queue,threading,json

# init hackhttp
code = urllib.urlopen("https://raw.githubusercontent.com/BugScanTeam/hackhttp/master/hackhttp/hackhttp.py")

exec(code.read())
# Testing Hackhttp
# hh = hackhttp()
# code, head, body, redirect, log = hh.http('https://blog.yesfree.pw')
# print code,head,body
global plugin,splugins
plugin = json.loads(_Plugin)
splugins = json.loads(_SPlugin)

class w8_Common(object):
    @staticmethod
    def get(url):
        hh = hackhttp()
        code, head, body, redirect, log = hh.http(url)
        return code,head,body,redirect,log

    @staticmethod
    def post(url,data):
        hh = hackhttp()
        code, head, body, redirect, log = hh.http(url,post=data)
        return code, head, body, redirect, log

    @staticmethod
    def getheaders(url):
        code, head, body, redirect, log = w8_Common.get(url)
        if code != 200:
            return 1
        heads = head.split('\n')
        for i in heads:
            if "Server" in i:
                print i.strip()
            if "X-Powered-By" in i:
                print i.strip()
        return 0

    @staticmethod
    def gettitle(url):
        code, head, body, redirect, log = w8_Common.get(url)
        if code != 200:
            return 1
        p = re.compile(r'<title>(.*)?</title>',re.I)
        title = p.findall(body)
        if(len(title)==1):
            return title[0]
        elif(len(title)>1):
            return title[0]
        return None


    @staticmethod
    def get_md5(html):
        m = hashlib.md5()
        m.update(html)
        md5 = m.hexdigest()
        return md5

    @staticmethod
    def thread(func, args, thr):
        '''[1] the func to run,[2] the func's args,[3] the thread nums'''
        q = Queue.Queue()
        t = []

        def start(q):
            while not q.empty():
                func(q.get())

        for a in args:
            q.put(a)
        for i in range(int(thr)):
            tt = threading.Thread(target=start, args=(q,))
            t.append(tt)
        for i in range(int(thr)):
            t[i].start()
        for i in range(int(thr)):
            # t[i].join(timeout=10)
            t[i].join()

class w8_report(object):
    def send_report(self,data):
        pass

class UrlManager(object):
    def __init__(self):
        self.new_urls = set()
        self.old_urls = set()

    def add_new_url(self, url):
        if url is None:
            return
        if url not in self.new_urls and url not in self.old_urls:
            self.new_urls.add(url)

    def add_new_urls(self, urls):
        if urls is None or len(urls) == 0:
            return
        for url in urls:
            self.add_new_url(url)

    def has_new_url(self):
        return len(self.new_urls) != 0

    def get_new_url(self):
        new_url = self.new_urls.pop()
        self.old_urls.add(new_url)
        return new_url

# spider code
import re
from urlparse import urljoin
class SpiderMain(object):
    def __init__(self, root, threadNum=10):
        global splugins
        self.urls = UrlManager()
        self.root = root
        self.threadNum = threadNum
        self.splugins = splugins

    def _judge(self, domain, url):
        if (url.find(domain) != -1):
            return True
        else:
            return False

    def _parse(self, page_url, content):
        if content is None:
            return
        # soup = BeautifulSoup(content, 'html.parser')
        webreg = re.compile('''<a[^>]+href=["\'](.*?)["\']''', re.IGNORECASE)
        urls = webreg.findall(content)
        _news = self._get_new_urls(page_url, urls)
        return _news

    def _get_new_urls(self, page_url, links):
        new_urls = set()
        for link in links:
            new_url = link
            new_full_url = urljoin(page_url, new_url)
            if (self._judge(self.root, new_full_url)):
                new_urls.add(new_full_url)
        return new_urls

    def craw(self):
        
        # splugins = [1]
        self.urls.add_new_url(self.root)
        while self.urls.has_new_url():
            if self.urls.has_new_url() is False:
                break
            new_url = self.urls.get_new_url()
            print("craw:" + new_url)
            code, head, body, redirect, log =w8_Common.get(new_url)
            if code != 200:
                continue
            new_urls = self._parse(new_url, body)
            self.urls.add_new_urls(new_urls)
            
            if self.splugins is not None:
                for tem_plugin in self.splugins:
                    code = urllib.urlopen(tem_plugin).read()
                    exec code
                    exec "run(new_url,body)"

# _U = 'http://www.adfun.cn/'
if plugin is not None:
    for temp_plugin in plugin:
        code = urllib.urlopen(temp_plugin).read()
        exec code
ww = SpiderMain(_U)
ww.craw()

if __name__ == '__main__':
    pass
    # w8_Common.getheaders("https://www.baidu.com")
    # print w8_Common.gettitle("https://www.baidu.com")