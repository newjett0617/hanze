# hanze 涵澤有限公司 - PHP開發工程師 - 上機考

1.	請使用Laravel完成以下API
2.	資料存入資料庫，資料庫可使用任意資料庫，例如mysql或sqlite等等
3.	資料庫創建方式請使用Laravel - migration
4.	程式碼請上傳至github，並將連結回信附上即可
5.	以json為回傳格式
6.	API

## 使用者註冊
```
Route: [POST] /user/register
參數
username: string 帳號，須為英文開頭，6~20位元
password: string 密碼，需同時有英數字，6~20位元
name: string 姓名
email: string Email
mobile: string 手機號碼，台灣手機
回傳
success: 1|0 1:成功 0:失敗
errorCode: 錯誤代碼
errorMessage: 錯誤訊息，失敗原因
```

## 使用者登入
```
Route: [POST] /user/login
參數
username: string 帳號或手機皆可用來登入
password: string 密碼
回傳
success: 1|0 1:成功 0:失敗
token: 登入token
errorCode: 錯誤代碼
errorMessage: 錯誤訊息，失敗原因
```

## 使用者留言
```
Route: [POST] /user/message
參數
token: string 使用者登入token
message: string 留言內容
回傳
success: 1|0 1:成功 0:失敗
messageId: 訊息ID
errorCode: 錯誤代碼
errorMessage: 錯誤訊息，失敗原因
```

## 使用者回覆留言
```
規則：僅可回覆留言(message)，不可回覆回覆(reply)
Route: [POST] /user/message/reply
參數
token: string 使用者登入token
message_id: string Message ID
reply: string 回覆內容
回傳
success: 1|0 1:成功 0:失敗
replyId: 回覆ID
errorCode: 錯誤代碼
errorMessage: 錯誤訊息，失敗原因
```
