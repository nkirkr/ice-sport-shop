$host.ui.RawUI.WindowTitle = "Uploading to server..."

$server = "detkinej.beget.tech"
$username = "detkinej_egor"
$password = "Fu*2sLLLiud6"
$localPath = "C:\Users\egorm\Documents\Проекты\plintus-verstka\revealed\docs\*"
$remotePath = "/home/$username/$server/public_html/"

Write-Host "Uploading files to $server..." -ForegroundColor Green
Write-Host "Local: $localPath" -ForegroundColor Yellow
Write-Host "Remote: $remotePath" -ForegroundColor Yellow

# Using scp with password via expect-like approach
$scpCommand = "scp -r -o StrictHostKeyChecking=no $localPath ${username}@${server}:${remotePath}"

# Create a temporary expect script for Windows
$expectScript = @"
set timeout -1
spawn $scpCommand
expect "password:"
send "$password\r"
expect eof
"@

# For Windows, we'll use a different approach with plink/pscp or manual
Write-Host "`nPlease enter password when prompted: Fu*2sLLLiud6" -ForegroundColor Cyan
Write-Host "`nExecuting: $scpCommand`n" -ForegroundColor Gray

# Execute scp (user will need to enter password manually or we need plink/pscp)
Start-Process -FilePath "scp.exe" -ArgumentList "-r", "-o", "StrictHostKeyChecking=no", $localPath, "${username}@${server}:${remotePath}" -Wait -NoNewWindow

Write-Host "`nUpload completed!" -ForegroundColor Green



