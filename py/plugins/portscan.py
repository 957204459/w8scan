# 端口扫描插件
import socket,time,thread
import urlparse

class PortScan:
    def __init__(self,ip):
        socket.setdefaulttimeout(3)
        self.lock = thread.allocate_lock()
        self.ip = ip
        try:
            for i in range(0, 65530):
                thread.start_new_thread(self.socket_port, (ip, int(i)))
        except:
            pass
        time.sleep(4)

    def socket_port(self,ip, port):
        try:
            if port >= 65535:
                print u'port end'
            s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
            result = s.connect_ex((ip, port))
            if result == 0:
                self.lock.acquire()
                print  ip, ':', port, 'open'
                report.add_list("端口",port)
                self.lock.release()
            s.close()
        except:
            pass

ip = gethostbyname(_U)    
print "Start scan port -> IP:",ip
PortScan(ip)
report.send()