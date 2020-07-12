<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<body>
  <h2>User Information</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th style="text-align:left">User ID</th>
      <th style="text-align:left">Full name</th>
      <th style="text-align:left">Username</th>
      <th style="text-align:left">EMail</th>
    </tr>
    <xsl:for-each select="users/user">
    <tr>
      <td><xsl:value-of select="user_id"/></td>
      <td><xsl:value-of select="fullname"/></td>
      <td><xsl:value-of select="username"/></td>
      <td><xsl:value-of select="email"/></td>
    </tr>
    </xsl:for-each>
  </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>

