<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
    <body>
        <h1>Employees</h1>
        <table border="2px">
            <tr style="background-color:#bababa">
                <th>Image</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Salary</th>
            </tr>
            <xsl:for-each select="Employee/Details">
                <tr style="background-color:#fafafa">
                    <td>
                        <img style="width:150px;">
                            <xsl:attribute name="src">
                                <xsl:value-of select="Image"/>
                            </xsl:attribute>
                        </img>
                    </td>
                    <td><xsl:value-of select="Name"/></td>
                    <td><xsl:value-of select="Age"/></td>
                    <td><xsl:value-of select="Address"/></td>
                    <td><xsl:value-of select="Salary"/></td>
                </tr>
            </xsl:for-each>
        </table>
    </body>
</html>
</xsl:template>
</xsl:stylesheet>