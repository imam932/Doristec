# python
import sys
import MySQLdb
import datetime
from lcs import LCS

class Database:

    host    = "localhost"
    user    = "root"
    password = ""
    db      = "plagiarismedb"

    def __init__(self):
        self.connection = MySQLdb.connect( host = self.host,
                                           user = self.user,
                                           password = self.password,
                                           db = self.db ,
                                           autocommit=True)
    def query(self, q):
        cursor = self.connection.cursor()
        cursor.execute(q)
        self.connection.commit()
        cursor.close()
        #self.connection.close()

    def queryall(self, q, va):
        cursor = self.connection.cursor( MySQLdb.cursors.DictCursor )
        cursor.execute(q, va)
        return cursor.fetchall()

    def queryv(self, q, va):
        cursor = self.connection.cursor( MySQLdb.cursors.DictCursor )
        cursor.execute(q, va)
        return cursor.fetchone()

    def __del__(self):
        self.connection.close()


if __name__== "__main__":
    db = Database()


    id_doc_uji = sys.argv[1] #dokumen yg di uji
    id_antrian = sys.argv[2] #ambil id antrian
    doc_uji = (id_doc_uji,) #harus ada koma agar tidak eror
    antrian = (id_antrian,)
    #doc_uji = ("uKShycv3EiU4J1xrbRzC13052019tiYka0QA5dRB6MJpNb9j",) #harus ada koma agar tidak eror
    #antrian = (24,)

    q = "SELECT * FROM dokumen_user WHERE id_dokumen_user = %s"

    data = db.queryv(q, doc_uji)

    q = "SELECT * FROM antrian_dataset as ad join dataset as ds on ad.id_data = ds.id_data WHERE id_antrian_dokumen = %s"

    data1 = db.queryall(q, antrian)

    #--------------------------------------------------

    for td in data1:
        list_sentence = ""
        angka_sentence = 0

        penelitian = data['penelitian']
        while True:

            common_sentence, persent = LCS.longest_common_sentence(penelitian, td['penelitian'])
            common_words = common_sentence.split(' ')

            #berhenti ketika hasil plagiat kurang dari 3 kata
            if(len(common_words) <= 3):
                break
            else:
                list_sentence += '%s###' % common_sentence #mengumpulkan hasil lcs ke 1 variable
                angka_sentence += float(persent)

                buang_plagiarisme = penelitian.split(common_sentence) #membuang kalimat plagiat pada text uji
                penelitian = ' '.join(buang_plagiarisme) #menggabungkan kembali setelah meembuang kalimat plagiat

        q = "UPDATE antrian_dataset SET similarity_angka='%s', similarity_text='%s', status=%d, updated_at='%s' WHERE id_antrian_dataset='%s' "% (angka_sentence, list_sentence, 1, datetime.datetime.now(), td['id_antrian_dataset'])
        db.query(q)
