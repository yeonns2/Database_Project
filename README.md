# Database_Project
혈액 관리 데이터베이스 프로젝트

## 1.프로젝트 소개

### 프로젝트 주제
혈액 기증자, 혈액 요청자, 혈액은행(혈액 관리자)이 혈액에 대한 데이터를 공유함으로써 혈액을 빠르게 공급받을 수 있도록 하는 혈액관리시스템.

### 프로젝트 언어 및 환경
- 서버 : apache
- DB : mysql
- 언어 : php,css3,html

### 주요 기능
- 혈액형 별 혈액 현황을 자동으로 업데이트 하는 기능
- 혈액 기증자가 헌혈 신청을 하고, 신청내역을 열람할 수 있는 기능
- 혈액 요청자가 자신이 주문한 혈액 내역을 열람할 수 있는 기능
- 관리자가 혈액 주문 내역, 헌혈자 정보를 열람할 수 있는 기능

## 2.데이터베이스 설계

### 요구사항 분석 명세서
 1. 혈액관리 시스템에서 donor가 되려면 id, Name, RRN, Age, Gender, BloodGroup, MobileNumber,   EmailId,  Address를 입력해야 한다.
 2. Donor은 id로 식별한다.
 3. Blood에 대한 id, bloodtype, amount 정보를 유지해야 한다.
 4. Blood는 id로 식별한다.
 5. Hospital은 id, name ,address, contactno 정보를 유지해야 한다.
 6. Hospital은 관리자에게 주문을 여러 개 할 수 있고, 관리자에게 여러 Hospital가 주문을 할 수 있  다.
 7. Hospital이 관리자에게 주문을 하면 id, ordernum, hospital_id, bloodtype, amount, message, orderdate 정보를 유지해야 한다. 
 8. 관리자는 id, UserName, Password 를 가진다.
 9. 관리자는 id로 식별한다.
 10. donor는 헌혈을 여러 번 할 수 있고 헌혈을 하면 id, donor_id, blood_id, donationdate 정보를 유지해야 한다.
 
### 시스템 구성도

### ER다이어그램
