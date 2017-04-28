# CMS识别插件
import threading,Queue

class Webcms:
    def __init__(self,url,threadNum):
        self.workQueue = Queue.Queue()
        self.url = url
        self.threadNum = threadNum
        self.NotFound = True
        self.result = ""

    def th_whatweb(self):
        if(self.workQueue.empty()):
            self.NotFound = False
            return False

        if(self.NotFound is False):
            return False
        cms = self.workQueue.get()
        _url = self.url + cms["url"]
        try:
            code, head, html, redirect, log = w8_Common.get(_url)
        except:
            html = None
        # print "[whatweb log]:checking %s"%_url
        if(html is None):
            return False
        if cms["re"]:
            if(html.find(cms["re"])!=-1):
                self.result = cms["name"]
                self.NotFound = False
                return True
        else:
            md5 = w8_Common.get_md5(html)
            if(md5==cms["md5"]):
                self.result = cms["name"]
                self.NotFound = False
                return True

    def run(self):
        _url = "%s/py/data/data.json"%_B
        
        
        try:
            body = w8_Common.urlget(_url)
        except:
            print "read %s whatcms module error!"%_url
            body = None
        if (body):
            webdata = json.loads(body, encoding="utf-8")
            for i in webdata:
                self.workQueue.put(i)
            while (self.NotFound):
                th = []
                for i in range(self.threadNum):
                    t = threading.Thread(target=self.th_whatweb)
                    t.start()
                    th.append(t)
                for t in th:
                    t.join()

            if (self.result):
                print "[webcms]:%s cms is %s" % (self.url, self.result)
                report.add("网站指纹",self.result)
            else:
                print "[webcms]:%s cms NOTFound!" % self.url
                report.add("网站指纹","Not Found!")
            
print "[...] Initialize whatweb module ..."
wwb = Webcms(_U,100)
wwb.run()
report.send()